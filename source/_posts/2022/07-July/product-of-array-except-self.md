---
extends: _layouts.post
section: content
title: Product of array except self
date: 2022-07-13
categories: [array-and-hashmap]
---

Problem URL: [Product of array except self](https://leetcode.com/problems/product-of-array-except-self/)

We can go thorugh the whole list once and caculate and store the multiplicatio of prefix indeies in the result array directly. That way we don't use any extra memory. Then we do the same thing but in reverse order. And instead of calculating the prefix values, we calculate the postfix value and directly save it in the result array. Finally we return the result.

```python 
class Solution:
    def productExceptSelf(self, nums: List[int]) -> List[int]:
        res = [1] * len(nums)
        prefix = 1
        for i in range(len(nums)):
            res[i] = prefix
            prefix *= nums[i]
        postfix = 1
        for i in range(len(nums)-1, -1, -1):
            res[i] *= postfix
            postfix *= nums[i]
        return res
```

We only go through the entire list twice, so 2n times. So, it's `O(n)` time complexity. Space complexity is also `O(n)`.