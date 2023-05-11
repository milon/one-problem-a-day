---
extends: _layouts.post
section: content
title: Maximum length of subarray with positive product
problemUrl: https://leetcode.com/problems/maximum-length-of-subarray-with-positive-product/
date: 2023-05-11
categories: [dynamic-programming]
---

We can use top-down dynamic programming to solve the problem. We will start from index 0, and move forward. If the current element is positive, we will increment the result by 1 and move forward. If the current element is 0, we will reset the result to 0. If the current element is negative, we will move forward until we find a 0 or the end of the array. Finally, we will return the result. We will use a hashmap to store the results of the subproblems. Now we will calculate all possible starting with values and return the largest one.

```python
class Solution:
    def getMaxLen(self, nums: List[int]) -> int:
        @cache
        def getMaxLenStartingWith(index: int, positive: bool=True) -> int:
            if index >= len(nums) or nums[index] == 0:
                return 0
            
            length = 0
            if (nums[index] > 0) is positive:
                length = 1 + getMaxLenStartingWith(index+1, True)
            else:
                if next_neg := getMaxLenStartingWith(index+1, False):
                    length = 1+next_neg
            
            return length

        return max(getMaxLenStartingWith(i) for i in range(len(nums)))
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`