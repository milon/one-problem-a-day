---
extends: _layouts.post
section: content
title: Find score of an array after marking all elements
problemUrl: https://leetcode.com/problems/find-score-of-an-array-after-marking-all-elements/
date: 2023-05-06
categories: [heap]
---

We will use a heap to store the elements. We will pop the maximum element from the heap and mark it. Then we will push the maximum element divided by 2 back to the heap. We will repeat this process until the heap is empty.

```python
class Solution:
    def arrayScore(self, nums: List[int]) -> int:
        n, visited = len(nums), set()
        heap = [(num, i) for i,num in enumerate(nums)]
        
        heapq.heapify(heap)
        res = 0
        while heap:
            num, i = heapq.heappop(heap)
            if i not in visited:
                res += num
                if i-1 >= 0:
                    visited.add(i-1)
                if i+1 < n:
                    visited.add(i+1)
                visited.add(i)
        return res
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`

