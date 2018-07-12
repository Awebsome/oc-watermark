<?php namespace Awebsome\Watermark\Console;

use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Input\InputArgument;

use Awebsome\Watermark\Models\Image as ImageModel;

class Clear extends Command
{
    /**
     * @var string The console command name.
     */
    protected $name = 'watermark:clear';

    /**
     * @var string The console command description.
     */
    protected $description = 'Delete all the images created by watermark.';

    /**
     * Execute the console command.
     * @return void
     */
    public function handle()
    {
        $images = ImageModel::whereNotNull('id')->get();
        $count = count($images);

        if($images)
        {
            foreach ($images as $image) {

                $img = ImageModel::find($image->id);

                $this->info('Purged: '.$img->disk_name);

                $img->delete();
            }
        }

        //ImageModel::truncate();

        $this->comment('Watermark ('.$count.' files) cleared successfully.');
    }

    /**
     * Get the console command arguments.
     * @return array
     */
    protected function getArguments()
    {
        return [];
    }

    /**
     * Get the console command options.
     * @return array
     */
    protected function getOptions()
    {
        return [];
    }
}
