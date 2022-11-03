<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Illuminate\Http\Request;
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer as IncomingAnswer;
use BotMan\Messages\Incoming\Answer;

class BotManController extends Controller
{
    public function handle()

    {

        $botman = app('botman');

  

        $botman->hears('{message}', function($botman, $message) {

  

            if ($message == 'hi' OR $message == 'hey' OR $message == 'hello') {

                $this->askName($botman);

            }
            elseif($message == 'age' OR $message == 'how old are you'){
                $botman->reply('27');
            }
            elseif($message == 'hey man'){
                $botman->reply('hello');
            }
            else{

                $botman->reply("write 'hi' for testing...");

            }

  

        });

  

        $botman->listen();

    }

  

    /**

     * Place your BotMan logic here.

     */

    public function askName($botman)

    {

        $botman->ask('Hello! What is your Name?', function(IncomingAnswer $answer) {

  

            $name = $answer->getText();

  

            $this->say('Nice to meet you '.$name);

        });

    }
}