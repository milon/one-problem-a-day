---
extends: _layouts.post
section: content
title: Maximum number of pairs in array
problemUrl: https://leetcode.com/problems/maximum-number-of-pairs-in-array/
date: 2022-10-26
categories: [array-and-hashmap]
---

We will count the frequency of each number in the array. Then we iterate the frequency map and count the number of pairs.

```python
class Solution:
    def numberOfPairs(self, nums: List[int]) -> List[int]:
        count = collections.Counter(nums)
        res = [0, 0]
        for val in count.values():
            res[0] += val // 2
            res[1] += val % 2
        return res
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`