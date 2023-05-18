---
extends: _layouts.post
section: content
title: Number of adjacent elements with the same color
problemUrl: https://leetcode.com/problems/number-of-adjacent-elements-with-the-same-color/
date: 2023-05-18
categories: [array-and-hashmap]
---

We can use a hashmap to store the indices of each color. Then, we can iterate through the array and check if the adjacent elements have the same color.

```python
class Solution:
    def colorTheArray(self, n: int, queries: List[List[int]]) -> List[int]:
        res = []
        lookup, count = collections.defaultdict(int), 0
        for i, color in queries:
            if lookup[i]: 
                count -= (lookup[i-1] == lookup[i]) + (lookup[i+1] == lookup[i])
            
            lookup[i] = color
            if lookup[i]:
                count += (lookup[i-1] == lookup[i]) + (lookup[i+1] == lookup[i])
            
            res.append(count)
        
        return res        
```

Time complexity: `O(n)` where n is the length of the queries array.
Space complexity: `O(n)` where n is the length of the queries array.
