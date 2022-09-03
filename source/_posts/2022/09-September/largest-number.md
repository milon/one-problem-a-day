---
extends: _layouts.post
section: content
title: Largest number
problemUrl: https://leetcode.com/problems/largest-number/
date: 2022-09-03
categories: [array-and-hashmap]
---

We will take the input array, and sort it with our custom compare method, where we sort it in natural string order in reverse. Then we convert the the numbers into string and merge it together to get our result. But first we will check whether the numbers input only has 0 in it, if yes we then return 0.

```python
class Solution:
    def largestNumber(self, nums: List[int]) -> str:
        if set(nums) == {0}:
            return "0"
        
        def compare(a, b):
            return int(str(b)+str(a)) - int(str(a)+str(b))
        
        nums = sorted(nums, key=cmp_to_key(compare))
        return "".join([str(n) for n in nums])
```

Time Complexity: `O(nlog(n))` <br/>
Space Complexity: `O(1)`