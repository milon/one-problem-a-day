---
extends: _layouts.post
section: content
title: Shortest subarray to be removed to make array sorted
problemUrl: https://leetcode.com/problems/shortest-subarray-to-be-removed-to-make-array-sorted/
date: 2022-11-16
categories: [two-pointers]
---

We will use two pointers to find the longest subarray that is sorted. The answer will be the length of the array minus the length of the longest subarray.

```python
class Solution:
    def findLengthOfShortestSubarray(self, arr: List[int]) -> int:
        arr = [0] + arr + [math.inf]
        
        l, r = 0, len(arr)-1
        shortest = math.inf
        while l < len(arr)-2 and arr[l] <= arr[l+1]:
            l += 1
            
        while l >= 0:
            while r-1 > l and arr[r-1] >= arr[l] and arr[r] >= arr[r-1]:
                r -= 1
            shortest = min(shortest, r-l-1)
            l -= 1
        
        return shortest
```

Time complexity: `O(n)` <br/>
Space complexity: `O(1)`