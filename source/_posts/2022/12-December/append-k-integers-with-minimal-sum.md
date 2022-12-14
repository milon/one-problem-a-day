---
extends: _layouts.post
section: content
title: Append k integers with minimal sum
problemUrl: https://leetcode.com/problems/append-k-integers-with-minimal-sum/
date: 2022-12-14
categories: [greedy]
---

We will use a greedy approach to solve this problem. We calculate the sum of the first `k` integers. We will iterate over the array and if the current number is less than `k`, we will add the difference between `k` and the current number to the result. We will increment `k` by 1.

```python
class Solution:
    def minimalKSum(self, nums: List[int], k: int) -> int:
        res = k*(k+1)//2
        level = k+1
        for num in sorted(set(nums)):
            if num < level:
                res += level-num
                level += 1
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(1)`