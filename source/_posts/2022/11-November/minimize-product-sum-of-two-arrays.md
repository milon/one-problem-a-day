---
extends: _layouts.post
section: content
title: Minimize product sum of two arrays
problemUrl: https://leetcode.com/problems/minimize-product-sum-of-two-arrays/
date: 2022-11-28
categories: [greedy]
---

We will sort the two arrays, first one in ascending order and second one in descending order. That will make sure the product of both array's item will be minimized. Then we will iterate over the arrays and calculate the product sum. Finally, we will return the product sum.

```python
class Solution:
    def minProductSum(self, nums1: List[int], nums2: List[int]) -> int:
        nums1.sort()
        nums2.sort(reverse=True)
        
        productSum = 0
        for i in range(len(nums1)):
            productSum += nums1[i] * nums2[i]
        
        return productSum
```

Time complexity: `O(nlog(n))`, n is the number of items in the `nums1` <br/>
Space complexity: `O(1)`

We can achieve the same result by using python's built-in function.

```python
class Solution:
    def minProductSum(self, nums1: List[int], nums2: List[int]) -> int:
        nums1.sort()
        nums2.sort(reverse=True)
        return sum([n1*n2 for n1, n2 in zip(nums1, nums2)])
```

