<?php
/*
You have information about n different recipes. You are given a string array recipes and a 2D string array ingredients. 
    The ith recipe has the name recipes[i], and you can create it if you have all the needed ingredients from ingredients[i]. 
    A recipe can also be an ingredient for other recipes, i.e., ingredients[i] may contain a string that is in recipes.
You are also given a string array supplies containing all the ingredients that you initially have, 
    and you have an infinite supply of all of them.
Return a list of all the recipes that you can create. You may return the answer in any order.
Note that two recipes may contain each other in their ingredients.
*/
class Solution {

    /**
     * 2115. Find All Possible Recipes from Given Supplies
     * @param String[] $recipes
     * @param String[][] $ingredients
     * @param String[] $supplies
     * @return String[]
     */
    function findAllRecipes($recipes, $ingredients, $supplies) {
        $supplyKeys = array_flip($supplies);
        $validRecipies = [];
        $keepChecking = true;
        while ($keepChecking) {
            $keepChecking = false;
            foreach ($recipes as $index => $recipe) {
                if (!isset($validRecipies[$recipe])) {
                    $haveIngredients = true;
                    foreach ($ingredients[$index] as $ingredient) {
                        if (!isset($supplyKeys[$ingredient])) {
                            $haveIngredients = false;
                            break;
                        }
                    }
                    if ($haveIngredients) {
                        $validRecipies[$recipe] = $recipe;
                        $supplyKeys[$recipe] = 1;
                        $keepChecking = true;
                    }
                }
            }
        }
        return array_values($validRecipies);    
    }
}

$c = new Solution;
//print_r($c->findAllRecipes(["bread"], [["yeast","flour"]], ["yeast","flour","corn"])); // Expect ["bread"]
//print_r($c->findAllRecipes(["bread","sandwich"], [["yeast","flour"],["bread","meat"]], ["yeast","flour","meat"])); // Expect ["bread","sandwich"]
print_r($c->findAllRecipes(["bread","sandwich","burger"], [["yeast","flour"],["bread","meat"],["sandwich","meat","bread"]], ["yeast","flour","meat"])); // Expect ["bread","sandwich","burger"]

?>