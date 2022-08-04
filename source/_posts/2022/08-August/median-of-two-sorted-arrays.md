---
extends: _layouts.post
section: content
title: Median of two sorted arrays
problemUrl: https://leetcode.com/problems/median-of-two-sorted-arrays/
date: 2022-08-04
categories: [binary-search]
---

We will first count the number of elements of both array and find the half. We assume the fisrt list is the longest, if not, then we swap them. Then we apply binary search to the longest list. Then we calculate left and right half for the both list. Then ewe determine if the partition is correct, if yes, then we return the median, if not, then we continue binary search.


```python
class Solution:
    def findMedianSortedArrays(self, nums1: List[int], nums2: List[int]) -> float:
        A, B = nums1, nums2
        total = len(nums1) + len(nums2)
        half = total // 2

        if len(B) < len(A):
            A, B = B, A

        l, r = 0, len(A) - 1
        while True:
            i = (l + r) // 2  # A
            j = half - i - 2  # B

            Aleft = A[i] if i >= 0 else -math.inf
            Aright = A[i + 1] if (i + 1) < len(A) else math.inf
            Bleft = B[j] if j >= 0 else -math.inf
            Bright = B[j + 1] if (j + 1) < len(B) else math.inf

            # partition is correct
            if Aleft <= Bright and Bleft <= Aright:
                # odd
                if total % 2:
                    return min(Aright, Bright)
                # even
                return (max(Aleft, Bleft) + min(Aright, Bright)) / 2
            elif Aleft > Bright:
                r = i - 1
            else:
                l = i + 1
```

Time Complexity: `O(log(min(n, m)))` <br/>
Space Complexity: `O(1)`