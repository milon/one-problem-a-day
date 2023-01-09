---
extends: _layouts.post
section: content
title: Maximal score after applying k operations
problemUrl: https://leetcode.com/problems/maximal-score-after-applying-k-operations/
date: 2023-01-09
categories: [heap]
---

We will use a heap to keep track of the maximum score. We will pop the maximum score from the heap and apply the operations to the popped score. We will push the new scores to the heap. We will repeat this process until we have applied all the operations.

```python
class Solution:
    def maxKelements(self, nums: List[int], k: int) -> int:
        nums = [-n for n in nums]
        heapq.heapify(nums)
        res = 0
        for _ in range(k):
            num = -1 * heapq.heappop(nums)
            res += num
            heapq.heappush(nums, -1 * math.ceil(num/3))
        return res
```

Time complexity: `O(klog(n))` <br/>
Space complexity: `O(n)`