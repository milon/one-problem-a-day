---
extends: _layouts.post
section: content
title: Merge sorted array
problemUrl: https://leetcode.com/problems/merge-sorted-array/
date: 2022-10-01
categories: [two-pointers]
---

We would love to work through nums1 and nums2 starting at index 0 and going to the end of each array, comparing them element by element, but because the first m elements of nums1 are important, we might accidentally overwrite them. So, how can we avoid that issue? Well, we can try to sort through the arrays in reverse!

This method uses a separate pointer, end, to keep track of the index in nums1 that we are currently putting the next largest element into. We also use m and n to keep track of where we are in nums1 and nums2, then we simply go through element by element and find the biggest element to put at the end of nums1. At the end, if there are any elements left in nums2, we put them into the front of nums1.

```python
class Solution:
    def merge(self, nums1: List[int], m: int, nums2: List[int], n: int) -> None:
        last = m+n-1
        while m>0 and n>0:
            if nums1[m-1]>nums2[n-1]:
                nums1[last] = nums1[m-1] 
                m -= 1
            else:
                nums1[last] = nums2[n-1]
                n -= 1
            last -= 1
        nums1[:n] = nums2[:n]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(1)`