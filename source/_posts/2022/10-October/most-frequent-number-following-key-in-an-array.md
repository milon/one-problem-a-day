---
extends: _layouts.post
section: content
title: Most frequent number following key in an array
problemUrl: https://leetcode.com/problems/most-frequent-number-following-key-in-an-array/
date: 2022-10-29
categories: [array-and-hashmap]
---

We will use a hashmap to store the frequency of each number. Then we will traverse the array and check if the current number is equal to the key. If it is, then we will increment the frequency of the next number. We will return the number with the maximum frequency.

```python
class Solution:
    def mostFrequentNumber(self, nums: List[int], key: int) -> int:
        freq = {}
        for i in range(len(nums) - 1):
            if nums[i] == key:
                freq[nums[i + 1]] = freq.get(nums[i + 1], 0) + 1
        return max(freq, key=freq.get)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`