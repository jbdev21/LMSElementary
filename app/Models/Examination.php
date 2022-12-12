<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    
    function module(){
        return $this->belongsTo(Module::class);
    }

    function user(){
        return $this->belongsTo(User::class);
    }

    function answers(){
        return $this->hasMany(Answer::class);
    }
    

    
    function moduleCompleted($module){
        $quizQuestions = Module::find($module)->questions()->count();

        if(!$quizQuestions){
            return false;
        }

        $answers = $this->answers()->whereHas('question', function($q) use ($module){
            $q->wheremoduleId($module);
        })->count();

        return $quizQuestions == $answers;
    }

    function moduleScore($itemized = null){

        $moduleQuestions = $this->module->questions()->count();
        $module = $this->module;

        if(!$moduleQuestions){
            return false;
        }

        $correct = $this->answers()->whereHas('question', function($q) use ($module){
                $q->whereModuleId($module->id)->where('correct', 1);
        })->count();

        if($itemized){
            if($itemized == "correct"){
                return $correct;
            }
            return $moduleQuestions;
        }
        return $correct.'/'. $moduleQuestions;
    }

}
