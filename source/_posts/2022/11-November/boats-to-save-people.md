---
extends: _layouts.post
section: content
title: Boats to save people
problemUrl: https://leetcode.com/problems/boats-to-save-people/
date: 2022-11-22
categories: [two-pointers]
---

We will sort the array. Then, we will use two pointers to keep track of the start and end of the array. Then, we will iterate through the array. If the sum of the numbers at the start and end pointers is less than or equal to the limit, then we will increment the start pointer and decrement the end pointer. If the sum of the numbers at the start and end pointers is greater than the limit, then we will decrement the end pointer. Then, we will increment the number of boats.

```python
class Solution:
    def numRescueBoats(self, people: list[int], limit: int) -> int:
        people.sort()
        start, end = 0, len(people) - 1
        boats = 0
        
        while start <= end:
            if people[start] + people[end] <= limit:
                start += 1
            end -= 1
            boats += 1
        
        return boats
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`