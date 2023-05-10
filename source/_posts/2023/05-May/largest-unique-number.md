---
extends: _layouts.post
section: content
title: Largest unique number
problemUrl: https://leetcode.com/problems/largest-unique-number/
date: 2023-05-10
categories: [array-and-hashmap]
---

We will use a hashmap to store the frequency of each number. Then we will iterate over the hashmap and return the maximum number whose frequency is 1. If there is no such number, we will return -1.

```python
class Solution:
    def largestUniqueNumber(self, nums: List[int]) -> int:
        freq = defaultdict(int)
        for num in nums:
            freq[num] += 1
        
        res = -1
        for num in freq:
            if freq[num] == 1:
                res = max(res, num)
        
        return res
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

This can be done in one line using `Counter` from `collections` module with just one line.

```python
class Solution:
    def largestUniqueNumber(self, nums: List[int]) -> int:
        return max((v for v, c in collections.Counter(nums).items() if c == 1), default=-1)
```