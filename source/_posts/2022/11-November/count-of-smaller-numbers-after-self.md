---
extends: _layouts.post
section: content
title: Count of smaller numbers after self
problemUrl: https://leetcode.com/problems/count-of-smaller-numbers-after-self/
date: 2022-11-29
categories: [binary-search]
---

We will make a sorted copy of the nums. Then we iterate over each number, find the index of the number in the sorted copy, and add the number of numbers smaller than the number to the result.

```python
class Solution:
    def countSmaller(self, nums: List[int]) -> List[int]:
        sorted_nums = sorted(nums)
        result = []
        for num in nums:
            index = bisect.bisect_left(sorted_nums, num)
            result.append(index)
            sorted_nums.pop(index)
        return result
```

Time complexity: `O(nlog(n))`, n is the length of the nums <br/>
Space complexity: `O(n)`