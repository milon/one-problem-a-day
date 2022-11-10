---
extends: _layouts.post
section: content
title: Score of parentheses
problemUrl: https://leetcode.com/problems/score-of-parentheses/
date: 2022-11-10
categories: [stack]
---

We will use a stack to keep track of the score of the parentheses. We will then iterate through the string and if the current character is an opening parenthesis, we will push the current score onto the stack. Otherwise, we will pop the top of the stack. If the top of the stack is an opening parenthesis, we will push the current score onto the stack. Otherwise, we will pop the top of the stack and add the current score to the top of the stack. We will then return the top of the stack.

```python
class Solution:
    def scoreOfParentheses(self, s: str) -> int:
        stack = [0]
        for c in s:
            if c == '(':
                stack.append(0)
            else:
                score = stack.pop()
                stack[-1] += max(2 * score, 1)
        return stack.pop()
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`