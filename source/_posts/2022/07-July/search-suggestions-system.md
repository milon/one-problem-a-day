---
extends: _layouts.post
section: content
title: Search suggestions system
problemUrl: https://leetcode.com/problems/search-suggestions-system/
date: 2022-07-29
categories: [array-and-hashmap]
---

First we will sort the products list. We will go through each character, create a search substring and then check if the product from the products list starts with the search substring. If yes, we add it to the suggestions, and when the suggestions length is 3, we append it to the result and go to the next character.

```python
class Solution:
    def suggestedProducts(self, products: List[str], searchWord: str) -> List[List[str]]:
        products.sort()
        
        res = []
        for i in range(len(searchWord)):
            search_substr = searchWord[:i+1]
            suggestions = []
            count = 0
            for product in products:
                if product.startswith(search_substr):
                    suggestions.append(product)
                    count += 1
                if count == 3:
                    break
            res.append(suggestions)
        
        return res
```

Time Complexity: `O(n*m)`, n is length of search word, m is the number of elements in the products list. <br/>
Space Complexity: `O(1)`
