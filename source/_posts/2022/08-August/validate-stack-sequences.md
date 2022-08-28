---
extends: _layouts.post
section: content
title: Validate stack sequences
problemUrl: https://leetcode.com/problems/validate-stack-sequences/
date: 2022-08-28
categories: [stack]
---

We will pushed each element from the pushed to a stack, and check if the top of the element is equal to the first element of popped, if yes, we pop the element from the stack. After we are done with the iteration, if the stack is empty, we return true, otherwise false.

```python
class Solution:
    def validateStackSequences(self, pushed: List[int], popped: List[int]) -> bool:
        stack = []
        i = 0
        for n in pushed:
            stack.append(n)
            while stack and stack[-1] == popped[i]:
                stack.pop()
                i += 1
        return len(stack) == 0
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`