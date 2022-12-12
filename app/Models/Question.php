<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $casts = [
        'options' => 'array'
    ];

    function module(){
        return $this->belongsTo(Module::class);
    }

    function lesson(){
        return $this->belongsTo(Lesson::class);
    }

    
    function userAnswer($id, $examinationId){
        return $this->answers()->whereUserId($id)->whereExaminationId($examinationId)->first();
    }

    function answers(){
        return $this->hasMany(Answer::class);
    }

    function answerText(){
        if($this->type == "multiple"){
            // return 'question' . $this->id;
            $index = $this->answer ? $this->answer-- : 0;
            return $this->options[$index] ?? "";
        }else{
            $text = "";
            foreach($this->options as $option){
                $text .= $option;
            }
            return $text;
        }
    }


    function checkForCorrect($answer){
        if($this->type == "multiple"){
            return $this->answer === $answer;
        }else{
            foreach($this->options as $index => $value){
                if($this->case_sensitive){
                    if (strcmp($value, $answer) == 0) {
                        return true;
                    }
                }else{
                    if (strtolower($value) == strtolower($answer)) {
                        return true;
                    }
                }
            }
        }

        return false;
    }

}
