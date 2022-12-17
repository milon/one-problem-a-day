---
extends: _layouts.post
section: content
title: Replace elements in an array
problemUrl: https://leetcode.com/problems/replace-elements-in-an-array/
date: 2022-12-17
categories: [array-and-hashmap]
---

We will use a hashmap to store the index of the input array for constant time lookup. Then we will iterate through the operations, and for each operation, we will update the value of the input array. We will also update the index of the input array in the hashmap.

```python
class Solution:
    def arrayChange(self, nums: List[int], operations: List[List[int]]) -> List[int]:
        lookup = {}
        for i, num in enumerate(nums):
            lookup[num] = i
        
        for val, replace in operations:
            if val in lookup:
                nums[lookup[val]] = replace
                lookup[replace] = lookup[val]
        
        return nums
```

Time complexity: `O(n+m)` <br/>
Space complexity: `O(n)`