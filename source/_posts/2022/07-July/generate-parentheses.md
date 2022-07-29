---
extends: _layouts.post
section: content
title: Generate parentheses
problemUrl: https://leetcode.com/problems/generate-parentheses/
date: 2022-07-29
categories: [stack]
---

We will solve it with backtracking. We will add one open parentheses, then call the recusive backtracking method. If the number of opening parentheses and closing parentheses are equal to input, that means we get our solution, we append it to our result. Otherwise, if opening parentheses is less than input, we add one, then call the recusive backtracking function again. If the number of opening parentheses is greater than number of closing parentheses, then we add one closing parentheses and repeat the process.

```python
class Solution:
    def generateParenthesis(self, n: int) -> List[str]:
        stack = []
        res = []

        def backtrack(openN, closeN):
            if openN == closeN == n:
                res.append("".join(stack))
                return

            if openN < n:
                stack.append('(')
                backtrack(openN+1, closeN)
                stack.pop()

            if closeN < openN:
                stack.append(')')
                backtrack(openN, closeN+1)
                stack.pop()

        backtrack(0, 0)
        return res
```

Time Complexity: `O(2^n)`
Space Complexity: `O(2^n)`