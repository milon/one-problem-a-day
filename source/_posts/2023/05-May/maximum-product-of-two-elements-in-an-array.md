---
extends: _layouts.post
section: content
title: Maximum product of two elements in an array
problemUrl: https://leetcode.com/problems/maximum-product-of-two-elements-in-an-array/
date: 2023-05-13
categories: [heap]
---

We will use a heap to get the two largest elements in the array. Then we will return the product of the two largest elements each substructed by 1.

```python
class Solution:
    def maxProduct(self, nums: List[int]) -> int:
        nums = [-n for n in nums]
        heapq.heapify(nums)
        
        max_1 = -heapq.heappop(nums)
        max_2 = -heapq.heappop(nums)
        
        return (max_1-1) * (max_2-1)
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`

We can use `heapq.nlargest` to get the two largest elements in the array.

```python
class Solution:
    def maxProduct(self, nums: List[int]) -> int:
        largest1, largest2 = heapq.nlargest(2, nums)
        return (largest1-1)*(largest2-1)
```


