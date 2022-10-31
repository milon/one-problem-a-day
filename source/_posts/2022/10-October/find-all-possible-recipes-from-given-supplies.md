---
extends: _layouts.post
section: content
title: Find all possible recipes from given supplies
problemUrl: https://leetcode.com/problems/find-all-possible-recipes-from-given-supplies/
date: 2022-10-31
categories: [graph]
---

We will create a graph where each node represents a recipe and each edge represents a supply. We will iterate over the recipes and add the edges to the graph. We will use topological sort to solve the dependencies in the graph. We will iterate over the supplies and check if the supply is in the graph or not. If it is not, we can return an empty list. If it is, we can add the recipes to the result. Finally, we will return the result.

```python
class Solution:
    def findAllRecipes(self, recipes: List[str], ingredients: List[List[str]], supplies: List[str]) -> List[str]:
        res = []
        q = deque(supplies)
        graph = defaultdict(list) 
        degree = defaultdict(int)
        
        for recipe, items in  zip(recipes, ingredients):
            degree[recipe] = len(items) 
            for item in items: graph[item].append(recipe)
                
        while q:
            ing = q.pop()
            for recipe in graph[ing]:
                degree[recipe] -= 1
                if degree[recipe] == 0:
                    q.appendleft(recipe)
                    res.append(recipe)
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`