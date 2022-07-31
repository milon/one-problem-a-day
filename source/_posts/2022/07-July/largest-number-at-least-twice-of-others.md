---
extends: _layouts.post
section: content
title: Largest number at least twice of others
problemUrl: https://leetcode.com/problems/largest-number-at-least-twice-of-others/
date: 2022-07-31
categories: [array-and-hashmap]
---

We will keep track of both largest and second largest number while iterating through the whole nums array. Then if the largest number is at least twice as big as the second largest, then we return the index of largest number, else we return -1.

```python
class Solution:
    def dominantIndex(self, nums: List[int]) -> int:
        largest, second = -1, -1
        
        for num in nums:
            if num >= largest:
                second = largest
                largest = num
            elif num >= second:
                second = num
    
        return nums.index(largest) if largest >= second*2 else -1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`