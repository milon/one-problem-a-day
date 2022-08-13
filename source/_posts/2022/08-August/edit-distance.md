---
extends: _layouts.post
section: content
title: Edit distance
problemUrl: https://leetcode.com/problems/edit-distance/
date: 2022-08-13
categories: [dynamic-programming]
---

To compute the minimum distance, we will recursively call our decision tree. If i is 0, then we need to insert j characters, if j = 0, then we need in delete i characters. This will be our base case, If i and j position of the character matches then we skip that character. If not, we have 2 options, either insert, delete or replace. We will take the minimum of this 3 operations.

```python
class Solution:
    def minDistance(self, word1: str, word2: str) -> int:
        def _minDistance(i: int, j: int, memo: dict):
            if (i, j) in memo:
                return memo[(i, j)]
            
            if i == 0:
                return j
            if j == 0:
                return i
            
            if word1[i-1] == word2[j-1]:
                memo[(i, j)] = _minDistance(i-1, j-1, memo)
                return memo[(i, j)]
            
            memo[(i, j)] = min(
                _minDistance(i, j-1, memo), 
                _minDistance(i-1, j, memo), 
                _minDistance(i-1, j-1, memo)
            ) + 1
            return memo[(i, j)]
        
        return _minDistance(len(word1), len(word2), {})
```

Time Complexity: `O(n*m)` <br/>
Space Complexity: `O(n*m)`