---
extends: _layouts.post
section: content
title: Sliding window maximum
problemUrl: https://leetcode.com/problems/sliding-window-maximum/
date: 2022-08-03
categories: [sliding-window]
---

We can solve this problem using monotonic increasing queue. We will add all the items from the input lust in a monotonic q and add the top of the q to our result. Then when the traverse is finished, we slice top k elements from our result and return it.

```python
class Solution:
    def maxSlidingWindow(self, nums: List[int], k: int) -> List[int]:
        q, res = collections.deque(), []
        
        for i in range(len(nums)):
            while q and q[0] <= i-k:
                q.popleft()
            while q and nums[i] >= nums[q[-1]]:
                q.pop()
            q.append(i)
            
            res.append(nums[q[0]])
        
        return res[k-1:]
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`