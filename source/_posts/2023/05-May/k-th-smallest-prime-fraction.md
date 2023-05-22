---
extends: _layouts.post
section: content
title: K-th smallest prime fraction
problemUrl: https://leetcode.com/problems/k-th-smallest-prime-fraction/
date: 2023-05-20
categories: [heap]
---

We can use a heap to store the fractions. We can start with the fraction `1/n` and add the next smallest fraction to the heap. We can repeat this process until we have added `k` fractions to the heap. The last fraction in the heap will be the `k`-th smallest fraction.

```python
class Solution:
    def kthSmallestPrimeFraction(self, arr: List[int], k: int) -> List[int]:
        heap = []
        for i in range(len(arr)):
            heapq.heappush(heap, (arr[i]/arr[-1], i, len(arr)-1))
        
        while k > 1:
            _, i, j = heapq.heappop(heap)
            j -= 1
            if j > i:
                heapq.heappush(heap, (arr[i]/arr[j], i, j))
            k -= 1
        
        return arr[heap[0][1]], arr[heap[0][2]]
```

Time complexity: `O(klog(n))` where n is the length of the array. <br/>
Space complexity: `O(n)` where n is the length of the array.
