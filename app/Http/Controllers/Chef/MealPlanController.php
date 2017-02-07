<?php

namespace App\Http\Controllers\Chef;

use App\Http\Controllers\Controller;
use App\Meal;
use App\MealPlan;
use App\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MealPlanController extends Controller
{
    /**
     * Check for chef authentication
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('chef.auth');
    }

    public function getMealPlanPage()
    {
        $plans= Plan::where('chef_id', Auth::guard('chef')->user())->get();
        return view('chef.mealplan')->with([
            'chef' => Auth::guard('chef')->user(),
            'plan'=> $plans //get data of meal plan
        ]);

    }

    public function prepareMealsPage(Plan $plan){
        $mealPlan= $plan::with(['mealplans.meal']);//eager loading of the mealplans, and meals
        return view('')->with([
            'chef' => Auth::guard('chef')->user(),
            'mealPlan' =>$mealPlan,

        ]);


    }

    // modal that pops up to create meal in meal plan

    public function setMeal()
    {
        $meal= Meal::with(['ingredients'])->get();//eager loading of ingredients
    }

    //modal that pops up to update meal in meal plan

    public function updateMeal()
    {

    }

    //modal that pops up to delete meal in meal plan

    public function deleteMeal()
    {

    }
}