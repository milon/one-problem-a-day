---
extends: _layouts.post
section: content
title: Majority element II
problemUrl: https://leetcode.com/problems/majority-element-ii/
date: 2022-12-01
categories: [array-and-hashmap]
---

We will count the frequency of each element in the array and return the elements whose frequency is greater than `n//3`. We will use a hashmap to store the frequency of each element, and a set to store the elements whose frequency is greater than `n//3`.

```python
class Solution:
    def majorityElement(self, nums: List[int]) -> List[int]:
        count = collections.Counter(nums)
        res = set()
        for num in nums:
            if count[num] > len(nums)//3:
                res.add(num)
        return list(res)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`