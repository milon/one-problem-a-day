---
extends: _layouts.post
section: content
title: Find k pairs with smallest sums
problemUrl: https://leetcode.com/problems/find-k-pairs-with-smallest-sums/
date: 2022-12-05
categories: [heap]
---

We will use a min heap to store the smallest sum. We will add the first element of each array to the heap. Then we will pop the smallest element from the heap and add the next element of the array from which the smallest element was popped. We will repeat this process until we have `k` pairs.

```python
class Solution:
    def kSmallestPairs(self, nums1: List[int], nums2: List[int], k: int) -> List[List[int]]:
        if not nums1 or not nums2:
            return []
        heap = []
        for i in range(len(nums1)):
            heapq.heappush(heap, (nums1[i] + nums2[0], i, 0))
        res = []
        while heap and len(res) < k:
            _, i, j = heapq.heappop(heap)
            res.append([nums1[i], nums2[j]])
            if j + 1 < len(nums2):
                heapq.heappush(heap, (nums1[i] + nums2[j + 1], i, j + 1))
        return res
```

Time complexity: `O(klog(n))` <br/>
Space complexity: `O(n)`