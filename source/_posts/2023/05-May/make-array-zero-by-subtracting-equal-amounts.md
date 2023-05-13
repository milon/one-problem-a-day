---
extends: _layouts.post
section: content
title: Make array zero by subtracting equal amounts
problemUrl: https://leetcode.com/problems/make-array-zero-by-subtracting-equal-amounts/
date: 2023-05-13
categories: [heap, math-and-geometry]
---

We can solve this problem by using a heap. We will add all the elements to the heap. Then we will pop the largest element from the heap and substruct it from all the other elements. We will repeat this process until all the elements are equal. Finally, we will return the number of steps we took to make all the elements equal.

```python
class Solution:
    def minOperations(self, nums: List[int]) -> int:
        heapq.heapify(nums)
        while nums and nums[0] == 0:
            heapq.heappop(nums)
        res = 0
        while nums:
            small = nums[0]
            for i in range(len(nums)):
                nums[i] = nums[i] - small
            while nums and nums[0] == 0:
                heapq.heappop(nums)
            res += 1
        return res
```

Time complexity: `O(nlogn)` <br/>
Space complexity: `O(n)`

We can also solve this about by using the fact that, same elements are always the same, and different elements are always different until they become the same. So we can just count the number of different elements and return the number.

```python
class Solution:
    def minimumOperations(self, nums: List[int]) -> int:
        return len(set(nums) - {0})
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`