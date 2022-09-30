---
extends: _layouts.post
section: content
title: Two sum
problemUrl: https://leetcode.com/problems/two-sum/
date: 2022-07-10
categories: [array-and-hashmap]
---

This problem has very clear statement. It will have a list of integer and a target integer. We should return the 2 indeces of the numbers that adds up to the target. It is guranteed that we will have a solution and it would be unique.

We can just through a hashmap into the problem and thats it. We will store the number itself as the key and index as the value in the hashmap. Then when we iterate over the whole list, we will check the complement that is `target - current value`. If it is already exists in the hashmap, then we will return the index of the current element and also the index of the complement.

```python
class Solution:
    def twoSum(self, nums: List[int], target: int) -> List[int]:
        prevMap = {}
        for i, n in enumerate(nums):
            diff = target - n
            if diff in prevMap:
                return [prevMap[diff], i]
            prevMap[n] = i
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`
