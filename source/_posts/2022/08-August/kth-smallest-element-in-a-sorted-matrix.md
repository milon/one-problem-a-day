---
extends: _layouts.post
section: content
title: Kth smallest element in a sorted matrix
problemUrl: https://leetcode.com/problems/kth-smallest-element-in-a-sorted-matrix/
date: 2022-08-02
categories: [heap]
---

We will create a max heap and insert each element there. If the length of the heap is more than k, we pop item from the heap. After the iteration is done, we return to top of the heap. As python does not have max heap, we will use the min heap and multiply every element with -1. When we return, we will also return the result with multiply by -1.

```python
class Solution:
    def kthSmallest(self, matrix: List[List[int]], k: int) -> int:
        ROWS, COLS = len(matrix), len(matrix[0])
        maxHeap = []
        
        for r in range(ROWS):
            for c in range(COLS):
                heapq.heappush(maxHeap, -matrix[r][c])
                if len(maxHeap) > k:
                    heapq.heappop(maxHeap)
                    
        return -heapq.heappop(maxHeap)
```

Time Complexity: `O(m*n*log(k))`, m is the number of rows, n is the number of columns. <br/>
Space Complexity: `O(k)`