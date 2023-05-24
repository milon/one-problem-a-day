---
extends: _layouts.post
section: content
title: Maximum subsequence score
problemUrl: https://leetcode.com/problems/maximum-subsequence-score/
date: 2023-05-23
categories: [heap]
---

We can use a heap to store the elements in the array. Then, we can pop the elements from the heap and add them to the result. We will also keep track of the sum of the elements in the heap. If the sum is greater than the result, we will update the result.

```python
class Solution:
    def maxScore(self, nums1: List[int], nums2: List[int], k: int) -> int:
        res, prefixSum, maxHeap = 0, 0, []
        for a, b in sorted(list(zip(nums1, nums2)), key=itemgetter(1), reverse=True):
            prefixSum += a
            heappush(maxHeap, a)
            if len(maxHeap) == k:
                res = max(res, prefixSum * b)
                prefixSum -= heappop(maxHeap)                               
        return res
```

Time complexity: `O(nlog(n))` where n is the length of the array. <br/>
Space complexity: `O(n)` where n is the length of the array.