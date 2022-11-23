---
extends: _layouts.post
section: content
title: Rabbits in forest
problemUrl: https://leetcode.com/problems/rabbits-in-forest/
date: 2022-11-23
categories: [math-and-geometry]
---

We will use a map to store the number of rabbits with the same color. Then, we will iterate through the map. For each color, we will calculate the number of groups. Then, we will add the number of groups to the result. Then, we will return the result.

```python
class Solution:
    def numRabbits(self, answers: List[int]) -> int:
        res = 0
        count = collections.Counter(answers)
        
        for color, num in count.items():
            res += (num + color) // (color + 1) * (color + 1)
            
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`