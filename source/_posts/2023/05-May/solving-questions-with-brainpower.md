---
extends: _layouts.post
section: content
title: Solving questions with brainpower
problemUrl: https://leetcode.com/problems/solving-questions-with-brainpower/
date: 2023-05-11
categories: [dynamic-programming]
---

We will start from index 0, then either take the current element or skip it. If we take the current element, we will move forward to the next element. If we skip the current element, we will move forward to the next element. We will use a hashmap to store the results of the subproblems. Now we will calculate all possible starting with values and return the largest one.

```python
class Solution:
    def mostPoints(self, questions: List[List[int]]) -> int:
        def _mostPoints(i: int, memo: dict) -> int:
            if i >= len(questions):
                return 0
            if i in memo:
                return memo[i]
            
            points, jump = questions[i][0], questions[i][1]
            memo[i] = max(_mostPoints(i+1, memo), points + _mostPoints(i+jump+1, memo))
            return memo[i]
        
        return _mostPoints(0, {})
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`