---
extends: _layouts.post
section: content
title: Maximum number of books you can take
problemUrl: https://leetcode.com/problems/maximum-number-of-books-you-can-take/
date: 2022-12-19
categories: [stack]
---

Use stack to find how long a consecutive ramp can be built at each index. Previous higher shelves are popped out of the stack since they do not impact how long we can build. If ramp terminated by a previous lower shelf, ramp at the lower shelf can be included.

```python
class Solution:
    def maximumBooks(self, books: List[int]) -> int:
        n = len(books)

        prevSmaller = [-1] * n
        stack = []
        for i in reversed(range(n)):
            book = books[i]
            while stack and stack[-1] - i <= books[stack[-1]] - book:
                prevSmaller[stack.pop()] = i
            stack.append(i)
        
        def get_sum(start, length):
            return length * (2 * start - length + 1) // 2
        
        @cache
        def dp(i):
            curr, prev = books[i], prevSmaller[i]
            return get_sum(curr, min(i-prev, curr)) + (dp(prev) if prev != -1 else 0)

        return max(dp(i) for i in range(n))
```

Time Complexity: `O(n)` <br/>
Space Complexity: `O(n)`