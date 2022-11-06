---
extends: _layouts.post
section: content
title: Design an ordered stream
problemUrl: https://leetcode.com/problems/design-an-ordered-stream/
date: 2022-11-06
categories: [design]
---

We will use a list to store the values and a pointer to keep track of the next index to be filled. We will return the values from the pointer to the index of the current value.

```python
class OrderedStream:
    def __init__(self, n: int):
        self.values = [None] * n
        self.ptr = 0

    def insert(self, id: int, value: str) -> List[str]:
        self.values[id - 1] = value
        if id - 1 == self.ptr:
            while self.ptr < len(self.values) and self.values[self.ptr]:
                self.ptr += 1
            return self.values[id - 1 : self.ptr]
        return []
```

Time complexity: `O(n)` <br/>
Space complexity: `O(n)`