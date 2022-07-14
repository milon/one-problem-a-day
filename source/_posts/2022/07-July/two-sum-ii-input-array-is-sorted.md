---
extends: _layouts.post
section: content
title: Two sum II - input array is sorted
problemUrl: https://leetcode.com/problems/two-sum-ii-input-array-is-sorted/
date: 2022-07-14
categories: [two-pointers]
---

As the array is sorted, we will take 2 pointer at the beginning and the end. If the sum of two numbers are equal to target, we return. If the sum is bigger than target, that means we need a smaller number for the sum, so we move the end pointer, otherwise we move the beginning pointer. As we guranteed to have a result, we don't have to do anything else.

```python
class Solution:
    def twoSum(self, numbers: List[int], target: int) -> List[int]:
        left, right = 0, len(numbers)-1
        while left < right:
            sum = numbers[left] + numbers[right]
            if sum == target:
                return [left+1, right+1]
            if sum > target:
                right -= 1
            else:
                left += 1
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`