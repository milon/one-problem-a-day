---
extends: _layouts.post
section: content
title: Longest mountain in array
problemUrl: https://leetcode.com/problems/longest-mountain-in-array/
date: 2022-12-20
categories: [two-pointers]
---

We will use two pointers to keep track of the start and end of the mountain. We will iterate through the array and keep track of the start and end of the mountain. If the current element is greater than the previous element, we will increment the end pointer. If the current element is less than the previous element, we will decrement the end pointer. If the current element is equal to the previous element, we will reset the start and end pointers. We will keep track of the maximum length of the mountain.

```python
class Solution:
    def longestMountain(self, arr: List[int]) -> int:
        res = 0
        up = down = 0
        for i in range(1, len(arr)):
            if down and arr[i-1] < arr[i] or arr[i-1] == arr[i]: 
                up = down = 0
            up += arr[i-1] < arr[i]
            down += arr[i-1] > arr[i]
            if up and down:
                res = max(res, up+down+1)
        return res
```

Time complexity: `O(n)` where `n` is the length of `arr`. <br/>
Space complexity: `O(1)`