---
extends: _layouts.post
section: content
title: Different ways to add parentheses
problemUrl: https://leetcode.com/problems/different-ways-to-add-parentheses/
date: 2022-09-12
categories: [dynamic-programming]
---

We will create a decision tree with all possible options. As it is given only 3 types of operation is possible, we will check whether the current character belongs to any of these, then we calculate the left part and right part of the expression and evulate the result and put it in the result array. We will also use memoization to reduce repetation.

```python
class Solution:
    def diffWaysToCompute(self, expression: str) -> List[int]:
        def dfs(expression, memo):
            if expression in memo:
                return memo[expression]
            if expression.isdigit():
                memo[expression] = [int(expression)]
                return memo[expression]
            res = []
            for i, c in enumerate(expression):
                if c in "+-*":
                    left = dfs(expression[:i], memo)
                    right = dfs(expression[i+1:], memo)
                    res.extend(eval(str(x)+c+str(y)) for x in left for y in right)
            memo[expression] = res
            return memo[expression]
        
        return dfs(expression, {})
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`