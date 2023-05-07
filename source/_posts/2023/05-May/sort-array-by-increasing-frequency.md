---
extends: _layouts.post
section: content
title: Sort array by increasing frequency
problemUrl: https://leetcode.com/problems/sort-array-by-increasing-frequency/
date: 2023-05-07
categories: [array-and-hashmap]
---

We will use a hashmap to store the frequency of each number. Then we will sort the array by the frequency of each number. If the frequency of two numbers is the same, we will sort them by the value of the number. Finally, we will return the sorted array.

```python
class Solution:
    def frequencySort(self, nums: List[int]) -> List[int]:
        counter = collections.Counter(nums)
        return sorted(nums, key=lambda x: (counter[x], -x))
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`