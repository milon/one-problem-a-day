---
extends: _layouts.post
section: content
title: Kth missing positive number
problemUrl: https://leetcode.com/problems/kth-missing-positive-number/
date: 2022-10-26
categories: [binary-search]
---

The first idea we can think of when we look at this problem is just to traverse elements 1, 2, 3, ... and find missing element with index k. To make it efficient, we create arr_set: set of all numbers Iterate i from 1 to k + len(arr): it will be enough to cover. If we see missing number, we decrease k by 1. Finally, if we see that k == 0, then we return i.

```python
class Solution:
    def findKthPositive(self, arr, k):
        arr_set = set(arr)
        for i in range(1, k+len(arr)+1):
            if i not in arr_set: 
                k -= 1
            if k == 0: 
                return i
```

Time complexity: O(n) <br/>
Space complexity: O(n)

We can use binary search to find the missing positive as well. Our goal is to find the k-th missing number. We know, there are M numbers missing before arr[idx] and M >= k. So, if we step back from arr[idx] by M - k + 1, we always get k-th missing number.

```python
class Solution:
    def findKthPositive(self, arr: List[int], k: int) -> int:
        l, r = 0, len(arr)-1
        while l <= r:
            m = (l + r) // 2
            if arr[m]-1-m < k:
                l = m+1
            else:
                r = m-1
        return l+k
```

Time complexity: O(logn) <br/>
Space complexity: O(1)