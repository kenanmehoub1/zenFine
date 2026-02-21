<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate sitemap.xml file for ZenLife website';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info('🔄 Generating sitemap for ZenLife...');
        
        $sitemap = Sitemap::create();
        
        // الصفحات الثابتة في موقع ZenLife
        $pages = [
            '/' => ['priority' => '1.0', 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            '/home' => ['priority' => '0.9', 'freq' => Url::CHANGE_FREQUENCY_DAILY],
            '/services' => ['priority' => '0.9', 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            '/House_cleaning' => ['priority' => '0.8', 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            '/Office_cleaning' => ['priority' => '0.8', 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            '/Gym_cleaning' => ['priority' => '0.8', 'freq' => Url::CHANGE_FREQUENCY_WEEKLY],
            '/gallery' => ['priority' => '0.7', 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            '/contact' => ['priority' => '0.8', 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
            '/about' => ['priority' => '0.8', 'freq' => Url::CHANGE_FREQUENCY_MONTHLY],
        ];
        
        $bar = $this->output->createProgressBar(count($pages));
        $bar->start();
        
        foreach ($pages as $url => $config) {
            $sitemap->add(Url::create($url)
                ->setLastModificationDate(now())
                ->setChangeFrequency($config['freq'])
                ->setPriority($config['priority']));
            
            $bar->advance();
        }
        
        // حفظ الـ sitemap في المجلد public
        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $bar->finish();
        
        $this->newLine(2);
        $this->info('✅ Sitemap generated successfully!');
        $this->line('📁 Location: ' . public_path('sitemap.xml'));
        $this->line('🔗 URL: ' . url('sitemap.xml'));
        
        return Command::SUCCESS;
    }
}