---
extends: _layouts.post
section: content
title: Finding the number of visible mountains
problemUrl: https://leetcode.com/problems/finding-the-number-of-visible-mountains/
date: 2023-01-03
categories: [stack]
---

We will use a monotonic stack to keep track of the mountains that are visible. We will iterate over the mountains and for each mountain we will pop the stack until the top of the stack is smaller than the current mountain. Then, we will push the current mountain to the stack. Finally, we will return the size of the stack.

```python
class Solution:
    def visibleMountains(self, peaks: List[List[int]]) -> int:
        stack = [-math.inf]
        curMax = 0
        for x, y in sorted(peaks):
			# find slope
            pos, neg = x-y, x+y 
			
			# remove previous mountain that got overlapped
            while stack[-1] >= pos: 
                stack.pop()
			
			# will not get overlapped by previous mountain
            if neg > curMax: 
                curMax = neg 
                stack.append(pos)
                
        return len(stack) - 1
```

Time complexity: `O(nlog(n))` <br/>
Space complexity: `O(n)`