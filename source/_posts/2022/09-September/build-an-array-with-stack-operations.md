---
extends: _layouts.post
section: content
title: Build an array with stack operations
problemUrl: https://leetcode.com/problems/build-an-array-with-stack-operations/
date: 2022-09-08
categories: [two-pointers]
---

We will create a stack to match with our target and also create a result list. Then we start a loop from 1 to n and append each number to the stack. If the top of the stack does not match our target, we remove it and move to the next item. Along the way we keep track of each operations in our result array. If at any point, our stack matches with our target, we return the result or we return it after the iteration is done.

```python
class Solution:
    def buildArray(self, target: List[int], n: int) -> List[str]:
        stack, result = [], []
        l = 0
        for i in range(1, n+1):
            stack.append(i)
            result.append("Push")
            
            if stack == target:
                break
            if stack[-1] != target[l]:
                stack.pop()
                result.append("Pop")
            else:
                l += 1
        return result
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`