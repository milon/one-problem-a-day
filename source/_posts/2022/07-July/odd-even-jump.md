---
extends: _layouts.post
section: content
title: odd-even-jump
problemUrl: https://leetcode.com/problems/odd-even-jump/
date: 2022-11-22
categories: [dynamic-programming, stack]
---

We need to jump higher and lower alternately to the end.

Take [5,1,3,4,2] as example.

If we start at 2, we can jump either higher first or lower first to the end, because we are already at the end. higher(2) = true, lower(2) = true.

If we start at 4, we can't jump higher, higher(4) = false we can jump lower to 2, lower(4) = higher(2) = true

If we start at 3, we can jump higher to 4, higher(3) = lower(4) = true. we can jump lower to 2, lower(3) = higher(2) = true.

If we start at 1, we can jump higher to 2, higher(1) = lower(2) = true. we can't jump lower, lower(1) = false.

If we start at 5, we can't jump higher, higher(5) = false. we can jump lower to 4, lower(5) = higher(4) = false.

So the answer is 3.

```python
class Solution:
    def oddEvenJumps(self, arr: List[int]) -> int:
        n = len(arr)
        next_higher, next_lower = [0]*n, [0]*n
        
        stack = []
        for a, i in sorted([a, i] for i, a in enumerate(arr)):
            while stack and stack[-1] < i:
                next_higher[stack.pop()] = i
            stack.append(i)
        
        stack = []
        for a, i in sorted([-a, i] for i, a in enumerate(arr)):
            while stack and stack[-1] < i:
                next_lower[stack.pop()] = i
            stack.append(i)
            
        higher, lower = [0]*n, [0]*n
        higher[-1] = lower[-1] = 1
        for i in range(n-2, -1, -1):
            higher[i] = lower[next_higher[i]]
            lower[i] = higher[next_lower[i]]
            
        return sum(higher)
```

Time Complexity: `O(nlog(n))`, n is the length of the given array. <br/>
Space Complexity: `O(n)`